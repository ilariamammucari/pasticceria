const express = require('express');
const sqlite3 = require('sqlite3').verbose();
let app = express();
const path = require('path');

const db = new sqlite3.Database('dbFile/numeri.db');

app.use(express.json());
app.use((req, res, next) => {
    res.append('Access-Control-Allow-Origin', ['*']);
    res.append('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.append('Access-Control-Allow-Headers', 'Content-Type');
    next();
});

app.get('/', function(req, res) {
    res.sendFile(path.join('/Users/ilariamammucari/Documents/mamp_public/test/numeri-africani/index.html'));
});

app.get('/all-numbers', (req,res) => {
    db.all("SELECT * FROM numeri_africani", (err,row) => {
        if (err) {
            console.log(err.message);
            res.send({
                code: "KO",
                data: err.message
            })
        }else {
            res.send(row)
        }
    })
});

app.listen(4000, () => {
    console.log("Listen on port 4000...");
})