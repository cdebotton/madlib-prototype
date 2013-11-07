App.Adapter = DS.RESTAdapter.extend
  host: 'http://bu.dev'
  namespace: 'api/1'

module.exports = App.Store = DS.Store.extend
  revision: 13
  adapter: App.Adapter
