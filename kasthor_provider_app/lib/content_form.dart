import 'package:flutter/material.dart';

// void main() => runApp(const MyApp());

// class MyApp extends StatelessWidget {
//   const MyApp({Key? key});

//   @override
//   Widget build(BuildContext context) {
//     const appTitle = 'Form Validation Demo';

//     return MaterialApp(
//       title: appTitle,
//       home: Scaffold(
//         appBar: AppBar(
//           title: const Text(appTitle),
//         ),
//         body: const MyCustomForm(),
//       ),
//     );
//   }
// }




// Create a Form widget.
class MyCustomForm extends StatefulWidget {
  const MyCustomForm({Key? key});

  @override
  MyCustomFormState createState() {
    return MyCustomFormState();
  }
}

// Create a corresponding State class.
// This class holds data related to the form.
class MyCustomFormState extends State<MyCustomForm> {
  // Create a global key that uniquely identifies the Form widget
  // and allows validation of the form.
  //
  // Note: This is a GlobalKey<FormState>,
  // not a GlobalKey<MyCustomFormState>.
  final _formKey = GlobalKey<FormState>();

  String dropdownValue = 'One';
  DateTime _date = DateTime(2020, 11, 17);

  String? validate(value) {
    String? result = null;
    if (value == null || value.isEmpty) {
      result =  'Please enter some text';
    }
    return result;
  }

  //  final RestorableDateTime _selectedDate =
  //     RestorableDateTime(DateTime(2021, 7, 25));
  // late final RestorableRouteFuture<DateTime?> _restorableDatePickerRouteFuture =
  //     RestorableRouteFuture<DateTime?>(
  //   onComplete: _selectDate,
  //   onPresent: (NavigatorState navigator, Object? arguments) {
  //     return navigator.restorablePush(
  //       _datePickerRoute,
  //       arguments: _selectedDate.value.millisecondsSinceEpoch,
  //     );
  //   },
  // );

  // static Route<DateTime> _datePickerRoute(
  //   BuildContext context,
  //   Object? arguments,
  // ) {
  //   return DialogRoute<DateTime>(
  //     context: context,
  //     builder: (BuildContext context) {
  //       return DatePickerDialog(
  //         restorationId: 'date_picker_dialog',
  //         initialEntryMode: DatePickerEntryMode.calendarOnly,
  //         initialDate: DateTime.fromMillisecondsSinceEpoch(arguments! as int),
  //         firstDate: DateTime(2021),
  //         lastDate: DateTime(2022),
  //       );
  //     },
  //   );
  // }

  // @override
  // void restoreState(RestorationBucket? oldBucket, bool initialRestore) {
  //   registerForRestoration(_selectedDate, 'selected_date');
  //   registerForRestoration(
  //       _restorableDatePickerRouteFuture, 'date_picker_route_future');
  // }

  // void _selectDate(DateTime? newSelectedDate) {
  //   if (newSelectedDate != null) {
  //     setState(() {
  //       _selectedDate.value = newSelectedDate;
  //       ScaffoldMessenger.of(context).showSnackBar(SnackBar(
  //         content: Text(
  //             'Selected: ${_selectedDate.value.day}/${_selectedDate.value.month}/${_selectedDate.value.year}'),
  //       ));
  //     });
  //   }
  // }

  //    void _selectDate() async {
  //   final DateTime newDate = await showDatePicker(
  //     context: context,
  //     initialDate: _date,
  //     firstDate: DateTime(2017, 1),
  //     lastDate: DateTime(2022, 7),
  //     helpText: 'Select a date',
  //   );
  //   if (newDate != null) {
  //     setState(() {
  //       _date = newDate;
  //     });
  //   }
  // }

  @override
  Widget build(BuildContext context) {
    // Build a Form widget using the _formKey created above.
    return Form(
      key: _formKey,
      child: 
      SingleChildScrollView(
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
              Padding(
                padding: const EdgeInsets.symmetric(vertical: 16.0),
                child:  TextFormField(
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    hintText: 'Title',
                  ),
                  // The validator receives the text that the user has entered.
                  validator:  (value) => validate(value),
              ),
               ),
           Padding(
                padding: const EdgeInsets.symmetric(vertical: 16.0),
                child : TextFormField(
                  decoration: const InputDecoration(
                    border: OutlineInputBorder(),
                    hintText: 'Creator',
                  ),
                  // The validator receives the text that the user has entered.
                  validator:  (value) => validate(value),
                ),
           ),
           Padding(
                padding: const EdgeInsets.symmetric(vertical: 16.0),
              child: TextFormField(
                decoration: const InputDecoration(
                  border: OutlineInputBorder(),
                  hintText: 'Provider',
                ),
                // The validator receives the text that the user has entered.
                validator:  (value) => validate(value),
              ),
           ),
           Padding(
                padding: const EdgeInsets.symmetric(vertical: 16.0),
                child:  TextFormField(
                      decoration: const InputDecoration(
                      border: OutlineInputBorder(),
                      hintText: 'Summary',
                    ),
                    minLines: 6, // any number you need (It works as the rows for the textarea)
                    keyboardType: TextInputType.multiline,
                    maxLines: null,
                    validator:  (value) => validate(value),
                  )
          ), 
          ClipRRect(
            borderRadius: BorderRadius.all(
                    Radius.circular(35)
                  ),
            child:  Image.asset(
              '../beaver.png',
              width: 200,
              height: 200,
              fit: BoxFit.contain,
            )
          ),
           DropdownButton<String>(
              value: dropdownValue,
              icon: const Text("Category"),
              elevation: 16,
              style: const TextStyle(color: Colors.deepPurple),
              underline: Container(
                height: 2,
                color: Colors.deepPurpleAccent,
              ),
              onChanged: (String? newValue) {
                setState(() {
                  dropdownValue = newValue!;
                });
              },
              items: <String>['One', 'Two', 'Free', 'Four']
                  .map<DropdownMenuItem<String>>((String value) {
                return DropdownMenuItem<String>(
                  value: value,
                  child: Text(value),
                );
              }).toList(),
          ),
           DropdownButton<String>(
              value: dropdownValue,
              icon: const Text("MediaType"),
              elevation: 16,
              style: const TextStyle(color: Colors.deepPurple),
              underline: Container(
                height: 2,
                color: Colors.deepPurpleAccent,
              ),
              onChanged: (String? newValue) {
                setState(() {
                  dropdownValue = newValue!;
                });
              },
              items: <String>['One', 'Two', 'Free', 'Four']
                  .map<DropdownMenuItem<String>>((String value) {
                return DropdownMenuItem<String>(
                  value: value,
                  child: Text(value),
                );
              }).toList(),
          ),
          Padding(
            padding: const EdgeInsets.symmetric(vertical: 16.0),
            child: InputDatePickerFormField(
                firstDate: DateTime(1900),
                lastDate: DateTime(DateTime.now().year),
              ),
          ),
          
          Padding(
            padding: const EdgeInsets.symmetric(vertical: 16.0),
            child: ElevatedButton(
              onPressed: () {
                // Validate returns true if the form is valid, or false otherwise.
                if (_formKey.currentState!.validate()) {
                  // If the form is valid, display a snackbar. In the real world,
                  // you'd often call a server or save the information in a database.
                print(_formKey.currentWidget.toString());
                  ScaffoldMessenger.of(context).showSnackBar(
                    const SnackBar(content: Text('Processing Data')),
                  );
                }
              },
              child: const Text('Submit'),
            ),
          ),
         
          //   Padding(
          //   padding: const EdgeInsets.symmetric(vertical: 16.0),
          // ),
         
        ],
      ),
      ),
    );
  }
}
