import { ApolloClient, HttpLink } from '@apollo/client/core'
import { InMemoryCache } from '@apollo/client/cache'

const httpLink = new HttpLink({
  uri: "https://929b-168-228-85-114.ngrok.io/graphql"
})

const apolloClient = new ApolloClient({
  link: httpLink, 
  cache: new InMemoryCache()
})

export default apolloClient