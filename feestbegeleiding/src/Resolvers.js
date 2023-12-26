//https://www.apollographql.com/docs/apollo-server/data/resolvers"
const dataLoader = require("./dataSource");

const People = dataLoader.loadPeople();
const Verenigingen = dataLoader.loadVerenigingen();
const Feestbegeleiding = dataLoader.loadFeestbegeleiding();

const queryResolver = {
    people: () => People,
    verenigingen: () => Verenigingen,
    feestbegeleiding:()=>Feestbegeleiding,
    
    filterFeestbegeleidingVereniging: filterFeestbegeleidingVereniging,
    filterFeestbegeleidingPerson: filterFeestbegeleidingPerson,
}

function filterFeestbegeleidingVereniging(parent, args){
    var feestbegeleiding = [];
    for(member in args.Vereniging.members){
        feestbegeleiding.push(Feestbegeleiding.find(feestbegeleiding =>feestbegeleiding.firstPerson == member.name));
        feestbegeleiding.push(Feestbegeleiding.find(feestbegeleiding=>feestbegeleiding.secondPerson == member.name));
    }
    return feestbegeleiding;
}

function filterFeestbegeleidingPerson(parent, args){
    return Feestbegeleiding.find(feestbegeleiding =>feestbegeleiding.firstPerson ==args.PersonName) || Feestbegeleiding.find(feestbegeleiding =>feestbegeleiding.firstPerson ==args.PersonName);
}

personResolver = {
    feestbegeleiding: (parent) =>{
        return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstPerson== parent.name)|| Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson== parent.name)
    }
}
verenigingResolver={
    members: (parent) =>{
        return People.filter(people=>people.vereniging.name  == parent.name);
    },
    feestbegeleiding: (parent) =>{
        for(person in members){
            return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstPerson== person.name)|| Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson== person.name);
        }
        //return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstperson==(People.filter(people=>people.vereniging == parent.name))) || Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson==(People.filter(people=>people.vereniging == parent.name)));
    }
}

feestbegeleidingResolver={
    firstShift: (parent) => {
        return People.find(person => person.name == parent.firstPerson);
    },

    secondShift: (parent) => {
        return People.find(person => person.name == parent.secondPerson);
    },
}
 
const resolvers = {
    Query: queryResolver,
    Person: personResolver,
    Vereniging: verenigingResolver,
    Feestbegeleiding: feestbegeleidingResolver,
}

module.exports = resolvers;