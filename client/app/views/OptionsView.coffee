module.exports = App.OptionsView = Ember.CollectionView.extend
  classNames: ['options-list']
  classNameBindings: ['isActive']
  tagName: 'ul'
  itemViewClass: Ember.View.extend
    tagName: 'li'
    classNames: ['option-item']
    classNameBindings: ['isSelected']
    template: Ember.Handlebars.compile '{{view.content.title}}'

    isSelected: (->
      current = @get('parentView.parentView.selected.id')
      if current is @get 'content.id' then return 'selected'
    ).property 'parentView.parentView.selected'

    click: ->
      @set 'parentView.parentView.selected', @get 'content'
