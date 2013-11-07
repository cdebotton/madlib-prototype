module.exports = App.DropdownView = Ember.View.extend
  templateName: 'dropdown'
  tagName: 'span'
  classNames: ['dropdown']
  selected: null

  init: ->
    length = @get('content.filters').toArray().length
    key = Math.floor Math.random() * length
    @selected = @get('content.filters').objectAt key

  displayName: (->
    if @selected? then return @selected.get 'title'
  ).property('@each.filter')
