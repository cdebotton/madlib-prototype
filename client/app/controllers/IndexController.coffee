module.exports = App.IndexController = Ember.ObjectController.extend
  content: []

  isFiltered: false

  actions:
    filter: ->
      @toggleProperty 'isFiltered'
      $('body').animate {
        scrollTop: $(window).height()
      }
      setTimeout (->
        feed = document.querySelector '#feed'
        msnry = new Masonry feed, {
          columnWidth: 240
          itemSelector: '.block'
        }
      ), 100
