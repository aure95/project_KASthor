import 'dart:convert';

class Content {

   final String id;
   final String title;
   final String provider;
   final String summary;
  //  final String[] medias;
   final String links;
  //  final String[] categories;
  // final String type;
  //  final String release_date;
  //  final String creation_date;
  //  final String created_by;
  //  final Object deleted_date;

   const Content({
    required this.id,
    required this.title,
    required this.provider,
    required this.summary,
    //  final String[] medias;
    required this.links,
    //  final String[] categories;
    // final String type;
    // required this.release_date,
    // required this.creation_date,
    // required this.created_by,
    // required this.deleted_date
   });

    factory Content.fromJson(Map<String, dynamic> json) {
      // json['albumId'] as int,

      return Content(
        id: json['id'] as String,
        title: json['title'] as String,
        provider: json['title'] as String,
        summary: json['summary'] as String,
        //  final String[] medias;
        links: json['links'] as String,
        //  final String[] categories;
        // final String type;


        //deactivated Problem
        // release_date: json['release_date'] as String,
        // creation_date: json['creation_date'] as String,
        // created_by: json['created_by'] as String,
        // deleted_date: json['deleted_date'] as Object
      );
  }

}
  // A function that converts a response body into a List<Photo>.
  List<Content> parseContents(String responseBody) {
  final parsed = jsonDecode(responseBody);
  var extract;
  
  if (parsed['data'] == null) {
    extract = parsed.cast<Map<String, dynamic>>();
  } else {
    extract = parsed['data'].cast<Map<String, dynamic>>();
  }
  // print("hello");
  // print(extract);
  // print("end");
  var toto =  extract.map<Content>((json) => Content.fromJson(json)).toList();
  // print(toto);
  // print("end toto");
  return toto;
 }