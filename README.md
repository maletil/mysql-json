# mysql-json
Bare-bone sql request with json output.

---

Requires 'auth' parameter in query.

## Output:

```JSON
{
  "entries": 2,
  "output": [
    {
      "Added": "2018-04-21 21:52:24",
      "Type": "book",
      "Code": "A26013",
      "Price": 8.5
    },
    {
      "Added": "2018-04-22 11:16:35",
      "Type": "magazine",
      "Code": "A26014",
      "Price": 9.2
    }
  ]
}
```
