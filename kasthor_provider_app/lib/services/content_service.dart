import 'package:http/http.dart' as http;

class ContentService {

  const ContentService();

  Future<Object> getContents() async {
    final response = await http
        .get(Uri.parse('http://localhost:8000/api/categories?page=1&size=1'));

    if (response.statusCode == 200) {
      // If the server did return a 200 OK response,
      // then parse the JSON.
      return response.body;
    } else {
      // If the server did not return a 200 OK response,
      // then throw an exception.
      throw Exception('Failed to load content');
    }
  }

} 