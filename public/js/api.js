//load app server using express
const express = require('express')
const res = require('express/lib/response')
const app = express()
const morgan = require('morgan')
const mysql = require('mysql')

app.use(morgan('short'))


//Sends all products in category to endpoint http://localhost:3001/products/'category'
app.get('/products/:category',(req, res) => {

    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'eksamenv31'
    })

    const productCategory = req.params.category
    const queryString = "SELECT * FROM products WHERE category = ?"
    connection.query(queryString,[productCategory], (err, rows, fields) => {
        if (err){
            console.log("Failed to query for news: " + err)
            res.sendStatus(500)
            return
        }

        const products = rows.map((row)=>{
            return {
                Heading: row.heading, 
                Content: row.content, 
                Created: row.timestamp, 
                Stars: row.stars, 
                Category: row.category}
        })
        res.json(products)
    })

    // res.end();
})

//Sends all products to endpoint http://localhost:3001/products
app.get('/products/',(req, res) => {
    console.log("Fetching all products")

    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'eksamenv31'
    })

    const queryString = "SELECT * FROM products"
    connection.query(queryString, (err, rows, fields) => {
        if (err){
            console.log("Failed to query for news: " + err)
            //Sends "Interal Server Error" message
            res.sendStatus(500)
            return
        }

        const products = rows.map((row)=>{
            return {
                Heading: row.heading, 
                Content: row.content, 
                Created: row.timestamp, 
                Stars: row.stars, 
                Category: row.category}
        })
        res.json(products)
    })

    // res.end();
})

app.get("/", (req, res) =>{
    console.log("Responding to root route")
})

//localhost:3000
app.listen(3001, () => {
    console.log("Server is up and listening on 3000..")
})