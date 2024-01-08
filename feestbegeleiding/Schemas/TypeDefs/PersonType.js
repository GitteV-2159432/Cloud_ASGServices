const graphql= require('graphql');
const {GraphQLObjectType, GraphQLInt, GraphQLString}  = graphql;


const PersonType = new GraphQLObjectType({
    name: "Person",
    fields: () =>({
        id: {type: GraphQLInt},
        firstName: {type: GraphQLString},
        lastName: {type: GraphQLString},
        association: {type: GraphQLString}, 
    })
});


module.exports = PersonType

