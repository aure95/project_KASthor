import 'dart:convert';

import 'package:flutter/material.dart';
import '../services/content_service.dart';
import '../models/content.dart';
import 'package:flutter/foundation.dart';
import './content_form.dart';


void main() {
  runApp(const MyApp(userRole: UserRole.SPONSOR));
}

Future<List<Content>> getAvailableContents() async {
  ContentService contentService = new ContentService();
  var body = await contentService.getContents(1,50);
  var test = compute(parseContents, body);
  print(test);
  return test;
}

enum UserRole {
  USER,
  SPONSOR
}

List<Tab> getTabs(UserRole role) {
  List<Tab> tabs = [   
            const Tab(icon: Icon(Icons.article)),
            const Tab(icon: Icon(Icons.add_circle_outline)),
          ]; 
  if (UserRole.SPONSOR == role) {
    tabs.add( const Tab(icon: Icon(Icons.paid)));
  }
  return tabs;
}

class MyApp extends StatelessWidget {

  final UserRole userRole;

  const MyApp({Key? key, required this.userRole}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {

    List<Tab> tabsGenerated = getTabs(userRole); 

    return MaterialApp(
      home: DefaultTabController(
        length: tabsGenerated.length,
        child: Scaffold(
          appBar: AppBar(
            bottom: TabBar(
              tabs: tabsGenerated
            ),
            title: const Center(
              child: Text('Manage content')
            ) 
          ),

        body: const TabBarView(
            children: [
              const ManageContentPage(),
              const MyCustomForm() ,
              Icon(Icons.directions_bike),
            ],
          ),
        ),
      ),
    );
  }
}

class ManageContentPage extends StatefulWidget {
  const ManageContentPage({Key? key}) : super(key: key);

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

  @override
  Widget build(BuildContext context) {
 
    return Scaffold(

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
    return const Center(child: CircularProgressIndicator());

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
