module.exports = App.FilterGroup = DS.Model.extend
  title: DS.attr 'string'
  filters: DS.hasMany 'filter'
