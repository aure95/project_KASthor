import 'package:http/http.dart' as http;
import '../models/content.dart';
import 'dart:convert';


class ContentService {

  const ContentService();

  Future<String> getContents() async {
    final response = await http
        .get(Uri.parse('http://localhost:8000/api/contents?page=1&size=1'));

    if (response.statusCode == 200) {
      // If the server did return a 200 OK response,
      // then parse the JSON.
      // var test = jsonDecode(response.body);
      // print(test['data']);
      // print("////end");
      // return test[''];
      return response.body;
    } else {
      // If the server did not return a 200 OK response,
      // then throw an exception.
      throw Exception('Failed to load content');
    }
  }

} 