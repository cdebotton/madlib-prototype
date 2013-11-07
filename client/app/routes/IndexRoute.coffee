module.exports = App.IndexRoute = Ember.Route.extend
  model: -> @store.find 'group'
  setupController: (controller, model) ->
    viewers = model.filter (record) ->
      record.get('title') is 'viewers'
    controller.set 'viewers', viewers[0]

    work = model.filter (record) ->
      record.get('title') is 'work'
    controller.set 'work', work[0]


    team = model.filter (record) ->
      record.get('title') is 'team'
    controller.set 'team', team[0]


    culture = model.filter (record) ->
      record.get('title') is 'culture'
    controller.set 'culture', culture[0]


    misc = model.filter (record) ->
      record.get('title') is 'misc'
    controller.set 'misc', misc[0]
