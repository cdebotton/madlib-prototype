(function(/*! Brunch !*/) {
  'use strict';

  var globals = typeof window !== 'undefined' ? window : global;
  if (typeof globals.require === 'function') return;

  var modules = {};
  var cache = {};

  var has = function(object, name) {
    return ({}).hasOwnProperty.call(object, name);
  };

  var expand = function(root, name) {
    var results = [], parts, part;
    if (/^\.\.?(\/|$)/.test(name)) {
      parts = [root, name].join('/').split('/');
    } else {
      parts = name.split('/');
    }
    for (var i = 0, length = parts.length; i < length; i++) {
      part = parts[i];
      if (part === '..') {
        results.pop();
      } else if (part !== '.' && part !== '') {
        results.push(part);
      }
    }
    return results.join('/');
  };

  var dirname = function(path) {
    return path.split('/').slice(0, -1).join('/');
  };

  var localRequire = function(path) {
    return function(name) {
      var dir = dirname(path);
      var absolute = expand(dir, name);
      return globals.require(absolute, path);
    };
  };

  var initModule = function(name, definition) {
    var module = {id: name, exports: {}};
    cache[name] = module;
    definition(module.exports, localRequire(name), module);
    return module.exports;
  };

  var require = function(name, loaderPath) {
    var path = expand(name, '.');
    if (loaderPath == null) loaderPath = '/';

    if (has(cache, path)) return cache[path].exports;
    if (has(modules, path)) return initModule(path, modules[path]);

    var dirIndex = expand(path, './index');
    if (has(cache, dirIndex)) return cache[dirIndex].exports;
    if (has(modules, dirIndex)) return initModule(dirIndex, modules[dirIndex]);

    throw new Error('Cannot find module "' + name + '" from '+ '"' + loaderPath + '"');
  };

  var define = function(bundle, fn) {
    if (typeof bundle === 'object') {
      for (var key in bundle) {
        if (has(bundle, key)) {
          modules[key] = bundle[key];
        }
      }
    } else {
      modules[bundle] = fn;
    }
  };

  var list = function() {
    var result = [];
    for (var item in modules) {
      if (has(modules, item)) {
        result.push(item);
      }
    }
    return result;
  };

  globals.require = require;
  globals.require.define = define;
  globals.require.register = define;
  globals.require.list = list;
  globals.require.brunch = true;
})();
require.register("config/app", function(exports, require, module) {
module.exports = Ember.Application.create({
  LOG_TRANSITIONS: true,
  LOG_TRANSITIONS_INTERNAL: true,
  rootElement: '#brooklyn-united'
});

});

;require.register("config/router", function(exports, require, module) {
module.exports = App.Router.map(function() {
  return this.route('filter', {
    path: '/filter/*params'
  });
});

});

;require.register("config/store", function(exports, require, module) {
App.Adapter = DS.RESTAdapter.extend({
  host: 'http://united.dev',
  namespace: 'api/1'
});

App.Serializer = DS.RESTSerializer.extend({
  normalize: function(property, hash, type) {
    var json, prop, value;
    json = {};
    for (prop in hash) {
      value = hash[prop];
      json[prop.camelize()] = value;
    }
    return this._super(property, json, type);
  }
});

module.exports = App.Store = DS.Store.extend({
  adapter: App.Adapter
});

});

;require.register("fixtures/filters", function(exports, require, module) {
module.exports = App.Filter.FIXTURES = [
  {
    id: 1,
    title: 'potential client',
    group: 1
  }, {
    id: 2,
    title: 'curious individual',
    group: 1
  }, {
    id: 3,
    title: 'potential employee',
    group: 1
  }, {
    id: 4,
    title: 'all',
    group: 2
  }, {
    id: 5,
    title: 'video',
    group: 2
  }, {
    id: 6,
    title: 'interactive',
    group: 2
  }, {
    id: 7,
    title: 'branding',
    group: 2
  }, {
    id: 8,
    title: 'campaign',
    group: 2
  }, {
    id: 9,
    title: 'whole',
    group: 3
  }, {
    id: 10,
    title: 'development',
    group: 3
  }, {
    id: 11,
    title: 'design',
    group: 3
  }, {
    id: 12,
    title: 'partners',
    group: 3
  }, {
    id: 13,
    title: 'office view',
    group: 4
  }, {
    id: 14,
    title: 'capabilities',
    group: 4
  }, {
    id: 15,
    title: 'relaxin\' time',
    group: 4
  }, {
    id: 16,
    title: 'neighborhood',
    group: 4
  }, {
    id: 17,
    title: 'oscar',
    group: 5
  }, {
    id: 18,
    title: 'playlist',
    group: 5
  }
];

});

;require.register("fixtures/groups", function(exports, require, module) {
module.exports = App.Group.FIXTURES = [
  {
    id: 1,
    title: 'viewers',
    filters: [1, 2, 3]
  }, {
    id: 2,
    title: 'work',
    filters: [4, 5, 6, 7, 8]
  }, {
    id: 3,
    title: 'team',
    filters: [9, 10, 11, 12]
  }, {
    id: 4,
    title: 'culture',
    filters: [13, 14, 15, 16]
  }, {
    id: 5,
    title: 'misc',
    filters: [17, 18]
  }
];

});

;require.register("initialize", function(exports, require, module) {
var folderOrder;

window.App = require('config/app');

require('config/router');

require('config/store');

folderOrder = ['initializers', 'mixins', 'routes', 'models', 'fixtures', 'views', 'controllers', 'helpers', 'templates', 'components'];

folderOrder.forEach(function(folder) {
  return window.require.list().filter(function(module) {
    return new RegExp("^" + folder + "/").test(module);
  }).forEach(function(module) {
    return require(module);
  });
});

});

;require.register("models/Filter", function(exports, require, module) {
module.exports = App.Filter = DS.Model.extend({
  title: DS.attr('string'),
  group: DS.belongsTo('group')
});

});

;require.register("models/Group", function(exports, require, module) {
module.exports = App.Group = DS.Model.extend({
  title: DS.attr('string'),
  filters: DS.hasMany('filter')
});

});

;require.register("routes/IndexRoute", function(exports, require, module) {
module.exports = App.IndexRoute = Ember.Route.extend({
  model: function() {
    return this.store.find('group');
  },
  setupController: function(controller, model) {
    return controller.set('groups', model);
  }
});

});

;require.register("templates/application", function(exports, require, module) {
Ember.TEMPLATES['application'] = Ember.Handlebars.template(function anonymous(Handlebars,depth0,helpers,partials,data) {
this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Ember.Handlebars.helpers); data = data || {};
  var buffer = '', hashTypes, hashContexts, escapeExpression=this.escapeExpression;


  hashTypes = {};
  hashContexts = {};
  data.buffer.push(escapeExpression(helpers._triageMustache.call(depth0, "outlet", {hash:{},contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("\n");
  return buffer;
  
});
});

;require.register("templates/dropdown", function(exports, require, module) {
Ember.TEMPLATES['dropdown'] = Ember.Handlebars.template(function anonymous(Handlebars,depth0,helpers,partials,data) {
this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Ember.Handlebars.helpers); data = data || {};
  var buffer = '', hashContexts, hashTypes, escapeExpression=this.escapeExpression;


  data.buffer.push("<div ");
  hashContexts = {'class': depth0};
  hashTypes = {'class': "STRING"};
  data.buffer.push(escapeExpression(helpers.bindAttr.call(depth0, {hash:{
    'class': (":cheech view.isActive:")
  },contexts:[],types:[],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("></div>\n<span ");
  hashContexts = {'class': depth0};
  hashTypes = {'class': "STRING"};
  data.buffer.push(escapeExpression(helpers.bindAttr.call(depth0, {hash:{
    'class': (":display view.isActive")
  },contexts:[],types:[],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(">");
  hashTypes = {};
  hashContexts = {};
  data.buffer.push(escapeExpression(helpers._triageMustache.call(depth0, "view.displayName", {hash:{},contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("</span>\n");
  hashContexts = {'contentBinding': depth0,'isActiveBinding': depth0};
  hashTypes = {'contentBinding': "STRING",'isActiveBinding': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.OptionsView", {hash:{
    'contentBinding': ("view.group.filters"),
    'isActiveBinding': ("view.isActive")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("\n");
  return buffer;
  
});
});

;require.register("templates/index", function(exports, require, module) {
Ember.TEMPLATES['index'] = Ember.Handlebars.template(function anonymous(Handlebars,depth0,helpers,partials,data) {
this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Ember.Handlebars.helpers); data = data || {};
  var buffer = '', hashContexts, hashTypes, escapeExpression=this.escapeExpression;


  data.buffer.push("<div class=\"hero madlibs panel\">\n  <header id=\"madlib-header\">\n    <h1>Hello</h1>\n    <h2>We are Brooklyn United</h2>\n  </header>\n  <div id=\"filters\">\n    <h3>Nice to Meet You</h3>\n    <div class=\"filter-group\">");
  hashContexts = {'contentBinding': depth0,'key': depth0,'id': depth0};
  hashTypes = {'contentBinding': "STRING",'key': "STRING",'id': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.DropdownView", {hash:{
    'contentBinding': ("groups"),
    'key': ("viewers"),
    'id': ("viewers-select")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(", We'd love to show you our ");
  hashContexts = {'contentBinding': depth0,'key': depth0,'id': depth0};
  hashTypes = {'contentBinding': "STRING",'key': "STRING",'id': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.DropdownView", {hash:{
    'contentBinding': ("groups"),
    'key': ("work"),
    'id': ("work-select")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(" that ");
  hashContexts = {'contentBinding': depth0,'key': depth0,'id': depth0};
  hashTypes = {'contentBinding': "STRING",'key': "STRING",'id': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.DropdownView", {hash:{
    'contentBinding': ("groups"),
    'key': ("team"),
    'id': ("team-select")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(" has collaborated on.</div>\n    <div class=\"filter-group\"><small>Please also check out our ");
  hashContexts = {'contentBinding': depth0,'key': depth0,'id': depth0};
  hashTypes = {'contentBinding': "STRING",'key': "STRING",'id': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.DropdownView", {hash:{
    'contentBinding': ("groups"),
    'key': ("culture"),
    'id': ("culture-select")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(" and ");
  hashContexts = {'contentBinding': depth0,'key': depth0,'id': depth0};
  hashTypes = {'contentBinding': "STRING",'key': "STRING",'id': "STRING"};
  data.buffer.push(escapeExpression(helpers.view.call(depth0, "App.DropdownView", {hash:{
    'contentBinding': ("groups"),
    'key': ("misc"),
    'id': ("misc-select")
  },contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push(" while you're here!</small></div>\n    <a href=\"#\">View</a>\n  </div>\n</div>\n\n");
  hashTypes = {};
  hashContexts = {};
  data.buffer.push(escapeExpression(helpers._triageMustache.call(depth0, "outlet", {hash:{},contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("\n");
  return buffer;
  
});
});

;require.register("templates/options", function(exports, require, module) {
Ember.TEMPLATES['options'] = Ember.Handlebars.template(function anonymous(Handlebars,depth0,helpers,partials,data) {
this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Ember.Handlebars.helpers); data = data || {};
  var buffer = '', stack1, hashTypes, hashContexts, escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = '', hashTypes, hashContexts;
  data.buffer.push("\n  <span class=\"option-item\">");
  hashTypes = {};
  hashContexts = {};
  data.buffer.push(escapeExpression(helpers._triageMustache.call(depth0, "item.title", {hash:{},contexts:[depth0],types:["ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data})));
  data.buffer.push("</span>\n");
  return buffer;
  }

  hashTypes = {};
  hashContexts = {};
  stack1 = helpers.each.call(depth0, "item", "in", "view.content", {hash:{},inverse:self.noop,fn:self.program(1, program1, data),contexts:[depth0,depth0,depth0],types:["ID","ID","ID"],hashContexts:hashContexts,hashTypes:hashTypes,data:data});
  if(stack1 || stack1 === 0) { data.buffer.push(stack1); }
  data.buffer.push("\n");
  return buffer;
  
});
});

;require.register("views/DropdownView", function(exports, require, module) {
module.exports = App.DropdownView = Ember.View.extend({
  templateName: 'dropdown',
  tagName: 'span',
  classNames: ['dropdown'],
  selected: null,
  isActive: false,
  init: function() {
    var groupFilter, key, length;
    key = this.get('key');
    groupFilter = this.get('content').filter(function(record) {
      return record.get('title') === key;
    });
    this.set('group', groupFilter[0]);
    length = this.get('group.filters').toArray().length;
    key = Math.floor(Math.random() * length);
    this.selected = this.get('group.filters').objectAt(key);
    return this._super([].slice.call(arguments));
  },
  displayName: (function() {
    if (this.selected != null) {
      return this.selected.get('title');
    }
  }).property('selected'),
  click: function() {
    return this.toggleProperty('isActive');
  }
});

});

;require.register("views/OptionsView", function(exports, require, module) {
module.exports = App.OptionsView = Ember.CollectionView.extend({
  classNames: ['options-list'],
  classNameBindings: ['isActive'],
  tagName: 'ul',
  itemViewClass: Ember.View.extend({
    tagName: 'li',
    classNames: ['option-item'],
    classNameBindings: ['isSelected'],
    template: Ember.Handlebars.compile('{{view.content.title}}'),
    isSelected: (function() {
      var current;
      current = this.get('parentView.parentView.selected.id');
      if (current === this.get('content.id')) {
        return 'selected';
      }
    }).property('parentView.parentView.selected'),
    click: function() {
      return this.set('parentView.parentView.selected', this.get('content'));
    }
  })
});

});

;
//# sourceMappingURL=app.js.map