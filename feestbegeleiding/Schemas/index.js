const graphql= require('graphql');
const {GraphQLObjectType, GraphQLSchema,GraphQLList, GraphQLInt, GraphQLString}  = graphql;

//https://www.mockaroo.com/
const personData = require('./Data/People.json');
const associationData = require('./Data/Associations.json');
const eventData = require('./Data/Events.json');

//https://www.youtube.com/watch?v=Dr2dDWzThK8
const PersonType = require('./TypeDefs/PersonType');
const AssociationType = require('./TypeDefs/AssociationType');
const EventType = require('./TypeDefs/EventType');

const RootQuery = new GraphQLObjectType({
    name: "rootQueryType",
    fields: {
        getAllPeople:{
            type: new GraphQLList(PersonType),
            resolve(parent, args){
                return personData
            }
        },
        getAllVerenigingen:{
            type: new GraphQLList(AssociationType),
            resolve(parent, args){
                return associationData
            }
        },
        getAllEvents:{
            type: new GraphQLList(EventType),
            resolve(parent, args){
                return eventData
            }
        },
        getPersonByID:{
            type: PersonType,
            args: {
                id: {type: GraphQLInt}
            },
            
            resolve(parent, args){
                const id = args.id;
                return personData.find((person)=>person.id == id)
            }
        },
        getEventBypersonID:{
            type: new GraphQLList(EventType),
            args: {
                personID: {type: GraphQLInt}
            },
            
            resolve(parent, args){
                let filteredEvent = eventData.filter((event) => {
                    return event.firstShift.id === args.personID || event.secondShift.id === args.personID
                })
                return filteredEvent
            }
        },
        getMembersByAssociationName:{
            type: new GraphQLList(PersonType),
            args:{
                associationName: {type: GraphQLString}
            },
            resolve(parent, args){
                let filteredPeople = personData.filter((member) => {
                    return member.association === args.associationName
                })
                return filteredPeople
            }
        }
    }
})

const Mutation = new GraphQLObjectType({
    name: "Mutation",
    fields:{
        createPerson:{
            type: PersonType,
            args: {
                firstName: {type: GraphQLString},
                lastName: {type: GraphQLString},
                association: {type: GraphQLString},
            },
            resolve(parent, args){
                if(associationData.find((vereniging)=>vereniging.name == args.association) == null){
                    associationData.push({id:associationData.length + 1, name: args.association})
                }
                personData.push({id:personData.length + 1, firstName: args.firstName, lastName: args.lastName, association: args.association})
                return args
            }
        },
        createEvent:{
            type: EventType,
            args:{
                nameEvent: {type: GraphQLString},
                firstName1: {type: GraphQLString},
                lastName1: {type: GraphQLString},
                association1: {type: GraphQLString},
                firstName2: {type: GraphQLString},
                lastName2: {type: GraphQLString},
                association2: {type: GraphQLString},
            },
            resolve(parent, args){
                person1 = {id:personData.length + 1, firstName: args.firstName1, lastName: args.lastName1, association: args.association1}
                person2 = {id:personData.length + 1, firstName: args.firstName2, lastName: args.lastName2, association: args.association2}
                if(personData.find((person)=>person.firstName == args.firstName1 && person.lastName==args.lastName1 &&person.association == args.association1) == null){
                    if(associationData.find((vereniging)=>vereniging.name == args.association1) == null){
                        associationData.push({id:associationData.length + 1, name: args.association1})
                    }
                    personData.push(person1)
                }
                if(personData.find((person)=>person.firstName == args.firstName2 && person.lastName==args.lastName2 &&person.association == args.association2) == null){
                    if(associationData.find((vereniging)=>vereniging.name == args.association2) == null){
                        associationData.push({id:associationData.length + 1, name: args.association2})
                    }
                    personData.push(person2)
                }                
                eventData.push({id:eventData.length + 1, nameEvent: args.nameEvent, firstShift: person1, secondShift: person2})
            }
        }, 
        createAssociation:{
            type: AssociationType,
            args:{
                name: {type: GraphQLString}
            },
            resolve(parent, args){              
                associationData.push({id:associationData.length + 1, name: args.name})
                return args
            }
        }


    }
})

module.exports = new graphql.GraphQLSchema({query:RootQuery, mutation: Mutation})

