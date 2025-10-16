# Database Migration Checklist

This document tracks the gradual migration from the legacy `mysql` class to the secure `Database` class with prepared statements.

## Migration Goals

1. **Eliminate SQL injection vulnerabilities** via prepared statements
2. **Improve code testability** through dependency injection
3. **Modernize codebase** to follow PSR standards
4. **Maintain zero downtime** during migration

---

## Phase 1: Foundation ✓

- [x] Created `Logger` class in `lib/logging.php`
- [x] Created `Database` class in `classes/Database.php`
- [x] Added global `$database` instance in `index.php`
- [x] Created test files in `dev/` directory
- [x] Verified both old and new systems work in parallel

**Status:** Complete - both systems operational

---

## Phase 2: Critical Security (Priority 1)

**Authentication & Session Management**

- [x] `classes/session.php` - Login, authentication, authorization

---

## Phase 3: High Priority (Priority 2)

**Account & Character Management**

- [ ] `lib/account.php` - Account CRUD operations
- [ ] `lib/player.php` - Character/player management
- [ ] `lib/guild.php` - Guild management
- [ ] `lib/keys.php` - Player key management
- [ ] `lib/inventory.php` - Player inventory management

**Core Game Content Editors**

- [ ] `lib/npc.php` - NPC editor (most used)
- [ ] `lib/npcmultiedit.php` - Bulk NPC editing
- [ ] `lib/items.php` - Item editor
- [ ] `lib/spawn.php` - Spawn/spawngroup editor
- [x] `lib/loot.php` - Loot table editor
- [x] `lib/merchant.php` - Merchant editor

---

## Phase 4: Medium Priority (Priority 3)

**Game Systems**

- [ ] `lib/faction.php` - Faction editor
- [ ] `lib/spells.php` - Spell editor
- [ ] `lib/spellset.php` - Spellset editor
- [ ] `lib/aa.php` - Alternative Advancement editor
- [ ] `lib/tradeskill.php` - Tradeskill recipe editor
- [ ] `lib/quest.php` - Quest editor
- [ ] `lib/qglobal.php` - Quest globals editor

**World & Zone**

- [ ] `lib/zone.php` - Zone editor
- [ ] `lib/misc.php` - Miscellaneous editors (fishing, foraging, ground spawns, traps)

---

## Phase 5: Low Priority (Priority 4)

**Server Administration**

- [ ] `lib/server.php` - Server config, variables, rules, bugs, hackers, petitions
- [ ] `lib/admin.php` - Admin functions
- [ ] `lib/util.php` - Utility functions
- [ ] `lib/content.php` - Content flags editor
- [ ] `lib/databuckets.php` - Data bucket editor

**Support & Lookup**

- [ ] `lib/common.php` - Common utility functions (search, lookups)
- [ ] `lib/data.php` - Data lookup functions

---

## Files Not Requiring Migration

**UI/Helper Files (no database access)**

- `lib/breadcrumbs.php` - Breadcrumb navigation builder
- `lib/headbars.php` - Header/navigation builder
- `lib/pagetitle.php` - Page title builder
- `lib/spellenums.php` - Spell constant definitions (no queries)
- `lib/spellops.php` - Spell operations menu (minimal/no queries)
- `lib/logging.php` - Already refactored ✓

**Class Files**

- `classes/Database.php` - New secure class ✓
- `classes/mysqli.php` - Legacy class (will be removed in Phase 7)
- `classes/session.php` - Being migrated in Phase 2
- `classes/template.php` - Template engine (no database access)

---

## Phase 6: Refactor to Dependency Injection

**Goal:** Remove global `$database` variable

- [ ] Refactor `Session` class to accept Database in constructor
- [ ] Refactor function libraries to class-based architecture
- [ ] Update `index.php` to inject dependencies
- [ ] Remove `global $database` declaration
- [ ] Update tests to use dependency injection

**Example transformation:**
```php
// Before (global)
function login($login, $pw) {
    global $database;
    $result = $database->fetchAssoc(...);
}

// After (dependency injection)
class Session {
    public function __construct(private Database $db) {}
    
    public function login($login, $pw) {
        $result = $this->db->fetchAssoc(...);
    }
}
```

## Phase 7: Cleanup

- [ ] Remove `classes/mysqli.php`
- [ ] Remove global `$mysql` variable
- [ ] Remove all commented-out old code
- [ ] Update documentation
- [ ] Final security audit
- [ ] Performance testing

---

## Testing Strategy

**For each refactored file:**

1. **Manual testing**
   - Test all CRUD operations
   - Test edge cases (empty results, invalid input)
   - Test SQL injection attempts (should be blocked)

2. **Log review**
   - Verify queries are logged correctly
   - Check for any error messages
   - Confirm user context is captured

3. **Rollback safety**
   - Keep old code commented out for 2 weeks
   - Monitor error logs for issues
   - Be ready to revert if problems occur

**Test SQL injection attempts:**
```txt
admin" OR "1"="1
'; DROP TABLE users; --
1' UNION SELECT * FROM peq_admin--
```
All should fail safely without executing malicious SQL.

---

## Progress Tracking

| Phase | Files | Status         | Completion |
|-------|-------|----------------|------------|
| 1 | Foundation | ✓ Complete     | 100%       |
| 2 | Critical Security (1 file) | ✓ Complete     | 100%       |
| 3 | High Priority (12 files) | 🔄 In Progress | 0%         |
| 4 | Medium Priority (9 files) | ⏳ Pending      | 0%         |
| 5 | Low Priority (7 files) | ⏳ Pending      | 0%         |
| 6 | Dependency Injection | ⏳ Pending      | 0%         |
| 7 | Cleanup | ⏳ Pending      | 0%         |

**Overall Progress: 17% (Phases 1-2 complete)**

**Files to migrate: 28 total**
- Phase 3: 12 files
- Phase 4: 9 files
- Phase 5: 7 files

---

## Notes

- **Never break production:** Both old and new code must work simultaneously
- **Security first:** Authentication is top priority, then user-facing editors
- **Test thoroughly:** Each file gets manual testing before moving to next
- **Document blockers:** Record any issues that prevent migration
- **Estimated timeline:** 3-6 months for complete migration (1-2 files per week)

---

## Current Blockers

*None*

---

## Completed Milestones

- **2025-01-10:** Updated Sessions to use secure Database class (parameterized queries)
- **2025-01-10:** Created Database and Logger classes
- **2025-01-10:** Verified parallel operation of old and new systems
- **2025-01-10:** Created migration documentation and test suite