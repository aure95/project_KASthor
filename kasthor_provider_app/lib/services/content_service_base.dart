import 'package:http/http.dart' as http;
import '../models/content.dart';
import 'dart:convert';
import 'package:flutter/foundation.dart';


class AbstractHttpService {
  
  final String collectionName;
  
  AbstractHttpService({required this.collectionName});

  Future<String> getObjects(int page, int size) async {
    final response = await http
        .get(Uri.parse('http://localhost:8000/api/${this.collectionName}?page=${page}&size=${size}'));

    if (response.statusCode == 200) {
      return response.body;
    } else {
      // If the server did not return a 200 OK response,
      // then throw an exception.
      throw Exception('Failed to load content');
    }
  }

  // Future<String> postObjectsAsMap(Object objectToSend) async {
  //   final response = await http
  //       .post(Uri.parse('http://localhost:8000/api/${this.collectionName}'),
  //       headers: <String, String>{
  //     'Content-Type': 'application/json; charset=UTF-8',
  //     },
  //     body: jsonEncode(objectToSend)
  //     );
        
  //   if (response.statusCode == 200) {
  //     return response.body;
  //   } else {
  //     // If the server did not return a 200 OK response,
  //     // then throw an exception.
  //     throw Exception('Failed to load content');
  //   }


  Future<String> postObjects(Object objectAsStringToSend) async {
    print('before encoding');
   
    var t = jsonEncode(objectAsStringToSend);
    print('after encoding');
    // print(t);
    
    final response = await http
        .post(Uri.parse('http://localhost:8000/api/${this.collectionName}'),
        headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
      },
      body: t
      );
        
    if (response.statusCode == 200) {
      print(response.body);
      return response.body;
    } else {
      // If the server did not return a 200 OK response,
      // then throw an exception.
      throw Exception('Failed to load content');
    }
  // }

  } 
}