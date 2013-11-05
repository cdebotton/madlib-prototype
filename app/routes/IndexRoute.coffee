module.exports = App.IndexRoute = Ember.Route.extend
  setupController: (controller) ->
    controller.set 'visitors', ['potential employee', 'potential client', 'curious individual']
