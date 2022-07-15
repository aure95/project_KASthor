import 'package:http/http.dart' as http;
import '../models/content.dart';
import 'dart:convert';


class ContentService {

  const ContentService();

  Future<String> getContents(int page, int size) async {
    final response = await http
        .get(Uri.parse('http://localhost:8000/api/contents?page=${page}&size=${size}'));

    if (response.statusCode == 200) {
      return response.body;
    } else {
      // If the server did not return a 200 OK response,
      // then throw an exception.
      throw Exception('Failed to load content');
    }
  }

} 