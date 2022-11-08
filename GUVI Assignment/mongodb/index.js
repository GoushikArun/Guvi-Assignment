var express = require("express")
var bodyParser = require("body-parser")
var mongoose = require("mongoose")

const app = express()


app.use(bodyParser.json())
app.use(express.static('public'))
app.use(bodyParser.urlencoded({
    extended:true
}))

mongoose.connect('mongodb://localhost:27017/user)data',{
    useNewUrlParser: true,
    useUnifiedTopology: true
});

var db = mongoose.connection;

db.on('error',()=>console.log("Error in Connecting to Database"));
db.once('open',()=>console.log("Connected to Database"))

app.post('/Update_Form',(req,res)=>{
    var first_name = req.body.fname;
    var last_name = req.body.lname;
    var dob = req.body.dob;
    var age = req.body.age;
    var education = req.body.edu;    
    var mobile_number = req.body.phno;
    var address_line_1 = req.body.address_line_1;
    var address_line_2 = req.body.address_line_2;
    var area = req.body.area;
    var postcode = req.body.postcode;
    var state = req.body.state;
    var country = req.body.nation;
    

    var data = {
        "first_name": first_name,
        "last_name" : last_name,
        "dob" : dob,
        "age" : age,
        "education": education,        
        "mobile_number": mobile_number,
        "address_line_1" : address_line_1,
        "address_line_2": address_line_2,
        "area" : area,
        "postcode" : postcode,
        "state" : state,
        "country" : country,
        
    }   

    
    db.collection('tb_user_data').insertOne(data,(err,collection)=>{
        if(err){
            throw err;
        }
        console.log("Record Inserted Successfully");
    });

    return res.redirect('profile_update_success.html')

})



app.get("/",(req,res)=>{
    res.set({
        "Allow-access-Allow-Origin": '*'
    })
    return res.redirect('profile.html');
}).listen(6666);


console.log("Listening on PORT 3000");

