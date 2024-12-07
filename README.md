# Adding Translations to Enums in Laravel

You can easily make use of `trans()` and `transChoice()` when working with backed enums.

Occasionally I've used simple traits to add some reusable translation logic, which is super handy when applying backed Enums to Models, and displaying related `<select>` options to the user.

Check out [Enums/Status.php](app/Enums/Status.php) for a basic example:

- [Enums/Traits/Translatable.php](app/Enums/Traits/Translatable.php) adds the basics of the translations.
- [lang/en/status.php](lang/en/status.php) Provides the translated values. The name of this translation file is derived from the enum's class name.

Check out [Enums/Role.php](app/Enums/Role.php) for a more complex example:

- [Enums/Traits/TranslatableChoices.php](app/Enums/Traits/TranslatableChoices.php) builds upon the original translations trait, adding the ability to use the `transChoice` system for anything that might need displaying in a "countable" manner.
- The `Role` enum also overrides the `langFile` method, to point to a specific language file.
- Finally, the `Role` enum also overrides the `langKey` to pick out specific keys for use in the language file.

So the system is pretty flexible, and easy to rework to your needs!  
Have a look around and see what you think.

```php
  // routes/web.php
  dd(
      // Basics
      Status::Jump->trans(),
      Status::options(),

      // Countable translations are possible without too much effort
      Role::Cat->trans(),
      Role::Cat->transChoice(2),
      Role::options(),
      Role::optionsChoice(2),
  );
```

![The output from the above code](https://github.com/user-attachments/assets/63bf2fed-9fdc-46b5-8006-9ce1650782b1)
