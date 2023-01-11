const express = require('express');
let app = express();

app.get('/all-numbers', (req,res) => {
    db.all("SELECT * FROM numbers", (err,row) => {
        if (err) {
            console.log(err.message);
            res.send({
                code: "KO",
                data: err.message
            })
        }else {
            res.send({
                code: "OK",
                data: row
            })
        }
    })
});

app.listen(4000, () => {
    console.log("Listen on port 4000...");
})