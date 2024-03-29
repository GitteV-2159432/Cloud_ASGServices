const express = require("express");
const app = express();
const PORT = 4000;
const{graphqlHttp, graphqlHTTP} = require("express-graphql");

const schema = require('./Schemas')

app.use('/graphql', graphqlHTTP({
    schema,
    graphiql: true
}));

app.listen(PORT, () =>{
    console.log("server running");
});