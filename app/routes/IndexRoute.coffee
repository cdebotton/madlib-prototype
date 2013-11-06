module.exports = App.IndexRoute = Ember.Route.extend
  setupController: (controller) ->
    controller.set 'filters', @get('store').find 'filter'
