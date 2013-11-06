module.exports = App.IndexController = Ember.ObjectController.extend
  content: []
  viewers: (->
    @get('filters').filter (filter) -> filter.get('group') is 1
  ).property '@each.filters'
