module.exports = App.DropdownView = Ember.View.extend
  templateName: 'dropdown'
  tagName: 'span'
  classNames: ['dropdown']
  selected: null

  init: ->
    key = @get 'key'
    groupFilter = @get('content').filter (record) ->
      record.get('title') is key
    @set 'group', groupFilter[0]
    length = @get('group.filters').toArray().length
    key = Math.floor Math.random() * length
    @selected = @get('group.filters').objectAt key
    @_super [].slice.call arguments

  displayName: (->
    if @selected? then return @selected.get 'title'
  ).property('@each.filter')

  click: ->
    @createChildView App.OptionsView, {
      content: @get 'group.filters'
    }
