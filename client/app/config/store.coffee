App.Adapter = DS.RESTAdapter.extend
  host: 'http://bu.dev'
  namespace: 'api/1'

App.Serializer = DS.RESTSerializer.extend
  normalize: (property, hash, type) ->
    json = {}
    json[prop.camelize()] = value for prop, value of hash
    @_super property, json, type


module.exports = App.Store = DS.Store.extend
  revision: 13
  adapter: App.Adapter
