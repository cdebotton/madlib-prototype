module.exports = App.IndexRoute = Ember.Route.extend
  model: -> @store.find 'group'
  setupController: (controller, model) ->
    controller.set 'groups', model
