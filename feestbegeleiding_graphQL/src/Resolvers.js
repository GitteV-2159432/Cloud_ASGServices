//https://www.apollographql.com/docs/apollo-server/data/resolvers"

const dataLoader = require("./DataSource");

const People = dataLoader.loadPeople();
if(People == null){
    console.log("leeg");
}
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
    return Feestbegeleiding.find(feestbegeleiding =>feestbegeleiding.firstPerson == args.name) //|| Feestbegeleiding.find(feestbegeleiding =>feestbegeleiding.firstPerson ==args.PersonName);
}

const personResolver = {
    feestbegeleiding: (parent) =>{
        return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstPerson== parent.name)|| Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson== parent.name)
    },
}
const verenigingResolver={
    members: (parent) =>{
        return People.filter(person=>person.vereniging.name == parent.name);
    },
    feestbegeleiding: (parent) =>{
        for(person in members){
            return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstPerson== person.name)|| Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson== person.name);
        }
        //return Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.firstperson==(People.filter(people=>people.vereniging == parent.name))) || Feestbegeleiding.filter(feestbegeleiding =>feestbegeleiding.secondPerson==(People.filter(people=>people.vereniging == parent.name)));
    },
}

const feestbegeleidingResolver={
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