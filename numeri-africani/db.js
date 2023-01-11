const sqlite3 = require('sqlite3').verbose();
const { open } = require('sqlite');
const db_json = require('./db.json');

const db = new sqlite3.Database('dbFile/numeri.db');
db.serialize(function() {
    db.run("CREATE TABLE IF NOT EXISTS numeri_africani (id INTEGER PRIMARY KEY AUTOINCREMENT, sms_phone VARCHAR)", function(err){
        if (err) {
            console.log(err.name);
        }
    });
})

const ids = db_json.id;
const sms_phones = db_json.sms_phone;

let stmt = db.prepare("INSERT INTO numeri_africani VALUES (?,?)");
ids.forEach((elm , i)=> {
    stmt.run( [elm,sms_phones[i]], function(err) {
        if (err) {
            console.log(err.name);
        }else {
            console.log("OK");
        }
    });
});
stmt.finalize();

db.close();