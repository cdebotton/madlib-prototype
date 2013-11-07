module.exports = App.Group = DS.Model.extend
  title: DS.attr 'string'
  filters: DS.hasMany 'filter'

App.GroupSerializer = App.Serializer.extend()
