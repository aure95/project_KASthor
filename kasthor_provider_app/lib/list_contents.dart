import 'dart:convert';

import 'package:flutter/material.dart';
import '../services/content_service.dart';
import '../models/content.dart';
import 'package:flutter/foundation.dart';


void main() {
  runApp(const MyApp());
}

Future<List<Content>> getAvailableContents() async {
  ContentService contentService = new ContentService();
  var body = await contentService.getContents(1,2);
  var test = compute(parseContents, body);
  print(test);
  return test;
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'manage contents',
      theme: ThemeData(
        // This is the theme of your application.
        //
        // Try running your application with "flutter run". You'll see the
        // application has a blue toolbar. Then, without quitting the app, try
        // changing the primarySwatch below to Colors.green and then invoke
        // "hot reload" (press "r" in the console where you ran "flutter run",
        // or simply save your changes to "hot reload" in a Flutter IDE).
        // Notice that the counter didn't reset back to zero; the application
        // is not restarted.
        primarySwatch: Colors.blue,
      ),
      home: const ManageContentPage(title: 'Manage content'),
    );
  }
}

class ManageContentPage extends StatefulWidget {
  const ManageContentPage({Key? key, required this.title}) : super(key: key);

  // This widget is the home page of your application. It is stateful, meaning
  // that it has a State object (defined below) that contains fields that affect
  // how it looks.

  // This class is the configuration for the state. It holds the values (in this
  // case the title) provided by the parent (in this case the App widget) and
  // used by the build method of the State. Fields in a Widget subclass are
  // always marked "final".

  final String title;

  @override
  State<ManageContentPage> createState() => _ManageContentState();
}

class _ManageContentState extends State<ManageContentPage> {
  int _counter = 0;
  late ContentService contentService;
  late Future<List<Content>> contents;
  
    _ManageContentState() {
      contentService = const ContentService();
    }

    @override
    void initState() {
      super.initState();
      contents =  getAvailableContents();
        
    }

  void _incrementCounter() {
    setState(() {
      // This call to setState tells the Flutter framework that something has
      // changed in this State, which causes it to rerun the build method below
      // so that the display can reflect the updated values. If we changed
      // _counter without calling setState(), then the build method would not be
      // called again, and so nothing would appear to happen.
      _counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    // This method is rerun every time setState is called, for instance as done
    // by the _incrementCounter method above.
    //
    // The Flutter framework has been optimized to make rerunning build methods
    // fast, so that you can just rebuild anything that needs updating rather
    // than having to individually change instances of widgets.
    return Scaffold(
      appBar: AppBar(
        // Here we take the value from the MyHomePage object that was created by
        // the App.build method, and use it to set our appbar title.
        title: Text(widget.title),
      ),
      body: FutureBuilder<List<Content>>(
  future: contents,
  builder: (context, snapshot) {
    if (snapshot.hasData) {
      // return Text(snapshot.data![0].medias.toString());
      return ListDemo(contents: snapshot.data!);
      
    } else if (snapshot.hasError) {
      return Text('${snapshot.error}');
    }

    // By default, show a loading spinner.
    return const CircularProgressIndicator();

  },
          ),
        );
  
  }
}



// BEGIN listDemo

class ListDemo extends StatelessWidget {

  final List<Content> contents;

  const ListDemo({Key? key, required this.contents}) : super(key: key);

  @override
  Widget build(BuildContext context) {
   
    return Scaffold(
     
      body: Scrollbar(
        child: ListView(
          restorationId: 'list_demo_list_view',
          padding: const EdgeInsets.symmetric(vertical: 8),
          children: [
            for (int index = 0; index < contents.length; index++)
              ListTile(
                leading: ExcludeSemantics(
                  child: CircleAvatar(child: Text('$index')),
                ),
                title: Text(
                  contents[index].title
                ),
                subtitle: Text(
                  contents[index].summary
                  )
          
              ),
          ],
        ),
      ),
    );
  }
}
