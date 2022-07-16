import 'dart:convert';

class Content {

   final String id;
   final String title;
   final String provider;
   final String summary;
   final List<dynamic> medias;
   final String links;
  //  final String[] categories;
  // final String type;
   final DateTime release_date;
  //  final DateTime creation_date;
  //  final String created_by;
  //  final DateTime deleted_date;

   const Content({
    required this.id,
    required this.title,
    required this.provider,
    required this.summary,
    required this.medias,
    required this.links,
    //  final String[] categories;
    // final String type;
    required this.release_date,
    // required this.creation_date,
    // required this.created_by,
    // required this.deleted_date
   });

  //  Content fromJSON<Content>(Map<String, dynamic> json) {
  //     return (Content.fromJson(json) as Content);
  //  }

  factory Content.fromJson(Map<String, dynamic> json) {
    // factory Content.fromJson(Map<String, dynamic> json) {
      // json['albumId'] as int,
      var release_date =  DateTime.parse(json['release_date'] as String);
      // var creation_date =  DateTime.parse(json['creation_date'] as String);
      // var deleted_date =  DateTime.parse(json['deleted_date'] != null? json['deleted_date']:null  as String);
    
  

      return Content(
        id: json['id'] as String,
        title: json['title'] as String,
        provider: json['provider'] as String,
        summary: json['summary'] as String,
        medias: json['medias'] as List<dynamic>,
        links: json['links'] as String,
        //  final String[] categories;
        // final String type;


        //deactivated Problem
        release_date: release_date,
        // creation_date: creation_date,
        // created_by: json['created_by'] as String,
        // deleted_date: deleted_date
      );
  }

  Map<String, dynamic> toJson() => {
        'id': id,
        'title': title,
        'summary': summary,
        // 'medias': medias.toString(),
        // 'links': links,
        // 'release_date': release_date.toIso8601String(),
  };
    
  static List<Content> parseContents(String responseBody) {
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


}
