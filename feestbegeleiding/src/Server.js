// Source: https://www.apollographql.com/docs/apollo-server/getting-started
// https://graphql.org/graphql-js/ 


const { readFileSync } = require('fs');
const { ApolloServer } = require('@apollo/server');
const { startStandaloneServer } = require('@apollo/server/standalone');

const resolvers = require('./Resolvers');
const typeDefs = readFileSync('./src/Schema.graphql', 'utf-8');

const server = new ApolloServer({
  typeDefs,
  resolvers,
});
  
startStandaloneServer(server, {
  listen: { port: 4000 },
})
.then(({ url }) => {
  console.log(`🚀  Server ready at: ${url}`);
});