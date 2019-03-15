const app = require('mssql'); // MSSQL Client

// Connection string
var sqlConfig = {
    user: 'root',
    password: '',
    server: 'localhost',
    port: 1433,
    database: 'SchelasVans',
    encrypt: false
}

var pool = sql.connect(sqlConfig, err => {
    if (err)
        throw err;
    })

// Start server and listen on http://localhost:8081/
var server = app.listen(8081, function () {
    var host = server.address().address
    var port = server.address().port

    console.log("SchelasVansAPI listening at http://%s:%s", host, port)
});

function execMsSql(queryRequest) {
    
    console.log(queryRequest);
    
    (async (result) => {
        
        try {
            console.log("sql connecting...")
            result = await pool.request().query(queryRequest);
            console.log(result);
            
        } catch (err) {
            console.log(err);    
        }
    })(result);
    console.log(result);
            
    return result;
    
}

app.get('/', (req, res) => res.send('SchelasVans! Connect with us today!!!'));


app.get('/:table/:id', (req, res) => {
    let catalog = req.params.table;
    let index = req.params.id;
    let result = {}
    
    var queryRequest = `SELECT * FROM ${catalog} WHERE ${index}`;
    (async (result) => {
         result = await execMsSql(queryRequest); 
    })(result);
    console.log(result.recordset);
    res.send(JSON.stringify(result.recordset)); // Result in JSON format
        
});