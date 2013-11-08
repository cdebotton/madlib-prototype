module.exports = App.Filter = DS.Model.extend
  title: DS.attr 'string'
  group: DS.belongsTo 'group'
