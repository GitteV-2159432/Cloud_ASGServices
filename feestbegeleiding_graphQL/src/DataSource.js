const fs = require('fs');
const csv = require('csv-parser');

function loadData(fileName, onData) {
    fs.createReadStream('./Data/' + fileName + '.csv').pipe(csv())
    .on('data', (row) => {
        onData(row);
    })
    .on('end', () => {
        console.log(fileName + ' CSV file successfully loaded');
    })
    .on('error', (error) => {
        console.error(fileName + ' CSV file gave an error: ' + error);
    });
}

function loadPeople(){
    const People =[];
    loadData("People", (row)=>{
        People.push({
            name: row.name,
            vereniging: row.vereniging
        });
    })
    return People;
}

function loadVerenigingen(){
    const Verenigingen =[];
    loadData("Verenigingen", (row)=>{
        Verenigingen.push({
            name: row.name
        });
    })
    return Verenigingen;
}

function loadFeestbegeleiding(){
    const Feestbegeleiding =[];
    loadData("Feestbegeleiding", (row)=>{
        Feestbegeleiding.push({
            nameEvent: row.eventName,
            firstPerson: row.firstShift,
            secondPerson: row.secondShift
        });
    })
    return Feestbegeleiding;
}

module.exports = {
    loadPeople,
    loadVerenigingen,
    loadFeestbegeleiding
};