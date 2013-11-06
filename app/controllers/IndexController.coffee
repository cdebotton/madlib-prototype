module.exports = App.IndexController = Ember.ArrayController.extend
  content: []
  viewers: (->
    console.log '!'
  ).property '@each.filters'
