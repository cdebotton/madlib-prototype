module.exports = App.OptionsView = Ember.CollectionView.extend
  tagName: 'ul'
  classNames: ['select-options']

  itemViewClass: Ember.View.extend
    tagName: 'li'
    templateName: 'dropdown-option'
