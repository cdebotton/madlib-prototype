module.exports = App.IndexRoute = Ember.Route.extend
  model: -> @store.find 'filter'

  setupController: (controller, model) ->
    controller.set 'viewers', model.filter (record) ->
      record.get('group.title') is 'viewers'
    controller.set 'work', model.filter (record) ->
      record.get('group.title') is 'work'
    controller.set 'team', model.filter (record) ->
      record.get('group.title') is 'team'
    controller.set 'culture', model.filter (record) ->
      record.get('group.title') is 'culture'
    controller.set 'misc', model.filter (record) ->
      record.get('group.title') is 'misc'
