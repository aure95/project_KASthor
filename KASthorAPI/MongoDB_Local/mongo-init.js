
print("start");

db.createUser(
    {
        user: "root",
        pwd: "root",
        roles: [
          { role: "readWrite", db: "KASthorDB" }
        ]
})

print("End adding the user roles.");

// db.createCollection('Contents', { capped: false });
db.createCollection('Categories', {
    // validator: { $jsonSchema: {
    //     bsonType: "object",
    //     required: [ "phone" ],
    //     properties: {
    //         phone: {
    //             bsonType: "string",
    //             description: "must be a string and is required"
    //         },
    //         email: {
    //             bsonType : "string",
    //             pattern : "@mongodb\.com$",
    //             description: "must be a string and match the regular expression pattern"
    //         },
    //         status: {
    //             enum: [ "Unknown", "Incomplete" ],
    //             description: "can only be one of the enum values"
    //         }
    //     }
    // } },
    // validationAction: "warn",
    capped: false });
db.createCollection('Users', { capped: false });
db.createCollection('Contents', { capped: false });

print("insert initial Categories")

db.Categories.insert([
    {value: "Action"},
    {value: "Thriller"},
    {value: "Comedy"},
    {value: "Anime"},
    {value: "Books"},
    {value: "Series"},
]);

print("insert Content fixture")


const content = 
{
    title : "MyTestTitle",
    creators: ["John Doe", "Alan Smithee"],
    provider:"KASthorInc",
    summary: "testSummary my super text is a super",
    picture: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy1uZTBlxjOfVEiZsIt9FSo_bkxgEb6_OslQ&usqp=CAU", 
    links: [
        "https://www.youtube.com/watch?v=T_JJjSFyX1g",
        "https://www.youtube.com/watch?v=dQw4w9WgXcQ"
        ],
    categories :"WIP",
    release_date : new Date()
}

db.Contents.insert(content)

print("end");