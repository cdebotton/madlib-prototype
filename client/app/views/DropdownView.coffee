module.exports = App.DropdownView = Ember.View.extend
  templateName: 'dropdown'
  tagName: 'span'
  classNames: ['dropdown']
  selected: null

  init: ->
    key = @get 'key'
    groupFilter = @get('content').filter (record) ->
      record.get('title') is key
    @group = groupFilter[0]
    length = @group.get('filters').toArray().length
    key = Math.floor Math.random() * length
    @selected = @group.get('filters').objectAt key

  displayName: (->
    if @selected? then return @selected.get 'title'
  ).property('@each.filter')

  click: ->
    alert @get 'content.title'
