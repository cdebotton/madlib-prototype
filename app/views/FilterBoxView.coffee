module.exports = App.FilterBoxView = Ember.View.extend
  templateName: 'filter-box'
  tagName: 'div'
  classNames: ['filter-box-wrapper']
  mouseEnter: ->

  mouseLeave: ->

  selected: (->

  ).property 'content'
