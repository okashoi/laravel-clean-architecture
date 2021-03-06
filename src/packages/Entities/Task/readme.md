# タスク

## ビジネスロジック

* 「タスク」は必ず「タスクID」「タスク名」を持つ
* 「タスク」は任意で「メモ」を持てる
* 「タスク」は作成されたとき「Inbox」から始まる
* 「Inbox」は「見積もり時間」と「着手日」を設定すると「Scheduled」になる
* 「Inbox」に対して「着手日」が未設定のままでも、「見積もり時間」を設定できる
* 「Inbox」に対して「見積もり時間」が未設定のまま、「着手日」を設定できない
* 「着手日」に過去の日付を **能動的に** 設定できない
* 「Scheduled」は「Inbox」に戻らない
* 「Scheduled」は「完了」できる
* （「Inbox」や「Scheduled」を分割して複数の「Inbox」にできる）
* 「Inbox」を「連絡待ち」にできる
* （「Scheduled」を「完了」したとき、「連絡待ち」を作成できる）

## 用語集

### タスク (task)

* ユーザが認識する「やらなければいけないこと」

### タスクID (task ID)

* タスクを一意に認識するための識別子
* 数値の連番

### タスク名 (task name)

* ユーザがタスクを認識するためのラベル

### メモ (task note)

* ユーザが書く、タスクについての付加情報
* プレーンテキスト形式

### Inbox (inbox)

* 「見積もり時間」や「着手日」が設定されていないタスク
* ユーザが思いついた直後の状態

### 見積もり時間 (estimated time)

* ユーザが見積もった、そのタスクを完了させるのに必要な時間

### 着手日 (start date)

* そのタスクを行う予定の日付

### Scheduled (scheduled)

* 「見積もり時間」や「着手日」が確定したタスク

### 完了する (complete)

* タスクを行い、それについて考える必要がなくなったときにタスクは「完了される」

### 完了済み (completed)

* 「完了され」たタスク
