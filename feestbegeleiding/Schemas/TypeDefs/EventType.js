const graphql= require('graphql');
const {GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList}  = graphql;

const personType = require('./PersonType')

const EventType = new GraphQLObjectType({
    name: "Feestbegeleiding",
    fields: () =>({
        id: {type: GraphQLInt},
        nameEvent: {type: GraphQLString},
        firstShift: {type: personType},
        secondShift: {type:personType},
    })
});


module.exports = EventType

