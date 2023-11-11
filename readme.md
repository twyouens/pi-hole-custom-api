# PiHole Custom API
Added some extra API endpoints for managing clients and groups through a restAPI.

---


### Endpoints
<details>
 <summary><code>GET</code> <code><b>/admin/customapi.php?action=groups&auth={apiToken}</b></code> <code>(lists all groups)</code></summary>

##### Parameters

> None

</details>

<details>
 <summary><code>GET</code> <code><b>/admin/customapi.php?action=clients&auth={apiToken}</b></code> <code>(lists all clients)</code></summary>

##### Parameters

> None

</details>

<details>
 <summary><code>GET</code> <code><b>/admin/customapi.php?action=unconfigured_clients&auth={apiToken}</b></code> <code>(lists all unconfigured clients)</code></summary>

##### Parameters

> None

</details>

<details>
 <summary><code>POST</code> <code><b>/admin/customapi.php?action=group&auth={apiToken}</b></code> <code>(add new group)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | name      |  required | string                  | group name  |
> | desc      |  optional | string | null           | group description  |

</details>

<details>
 <summary><code>POST</code> <code><b>/admin/customapi.php?action=client&auth={apiToken}</b></code> <code>(add new client)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | ip        |  required | string                  | device IP address  |
> | comment   |  optional | string | null           | client comment  |

</details>

<details>
 <summary><code>PUT</code> <code><b>/admin/customapi.php?action=group&auth={apiToken}</b></code> <code>(edit group)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | id        |  required | int                     | group id  |
> | name      |  required | string | null           | group name  |
> | desc      |  optional | string                  | group description  |
> | status    |  required | int bool                | group status 1=enabled | 0=disabled (default)  |

</details>

<details>
 <summary><code>PUT</code> <code><b>/admin/customapi.php?action=client&auth={apiToken}</b></code> <code>(edit client)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | id        |  required | int                     | client id  |
> | comment   |  optional | string | null           | client comment  |
> | groups    |  optional | array                   | array of group ids  |

</details>

<details>
 <summary><code>DELETE</code> <code><b>/admin/customapi.php?action=group&auth={apiToken}</b></code> <code>(delete client)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | id        |  required | int JSON array          | group id list |

</details>

<details>
 <summary><code>DELETE</code> <code><b>/admin/customapi.php?action=client&auth={apiToken}</b></code> <code>(delete client)</code></summary>

##### POST Parameters

> | name      |  type     | data type               | description                                                           |
> |-----------|-----------|-------------------------|-----------------------------------------------------------------------|
> | id        |  required | int JSON array          | client id list  |

</details>