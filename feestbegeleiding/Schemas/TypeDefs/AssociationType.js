const graphql= require('graphql');
const {GraphQLObjectType, GraphQLInt, GraphQLString}  = graphql;

const AssociationType = new GraphQLObjectType({
    name: "Vereniging",
    fields: () =>({
        id: {type: GraphQLInt},
        name: {type: GraphQLString},
    })
});


module.exports = AssociationType

