# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v2.2.2](https://github.com/es-shims/Array.prototype.find/compare/v2.2.1...v2.2.2) - 2023-08-27

### Commits

- [meta] add `auto-changelog` [`90ef840`](https://github.com/es-shims/Array.prototype.find/commit/90ef8406f1a3bea1d863796bfe0ad8a6f7c715e3)
- [Deps] update `es-abstract` [`c83a92f`](https://github.com/es-shims/Array.prototype.find/commit/c83a92f20b4277eaac8d7b858c23daa1790be347)
- [Dev Deps] update `@es-shims/api`, `@ljharb/eslint-config`, `aud`, `tape` [`4f76839`](https://github.com/es-shims/Array.prototype.find/commit/4f76839dd1b7f5596a338921bc725959b316e99a)
- [Dev Deps] update `@ljharb/eslint-config`, `@es-shims/api`, `aud`, `tape` [`1997871`](https://github.com/es-shims/Array.prototype.find/commit/19978718a422c3ea13797d095b2c3a8bf1b62a8f)
- [Deps] update `define-properties`, `es-abstract` [`28eb0a6`](https://github.com/es-shims/Array.prototype.find/commit/28eb0a6f235d5cf5be9437e8a9d0f3b2d18bd77e)
- [meta] create SECURITY.md [`dba046f`](https://github.com/es-shims/Array.prototype.find/commit/dba046ffcabe15c05c980b4c71c8adccceb1d1e9)
- [meta] fix npmrc config [`574c8fd`](https://github.com/es-shims/Array.prototype.find/commit/574c8fdee7b4fbb3ece7f242b69b7ce1a1ac3968)

<!-- auto-changelog-above -->

# 2.2.1
 - [Deps] update `define-properties`, `es-abstract`
 - [actions] update rebase action to use reusable workflow
 - [meta] use `npmignore` to autogenerate an npmignore file
 - [meta] create FUNDING.yml
 - [Dev Deps] update `aud`, `functions-have-names`, `tape`

# 2.2.0
 - [New] `shim`/`auto`: add `find` to `Symbol.unscopables`
 - [Deps] update `es-abstract`
 - [actions] reuse common workflows
 - [actions] update codecov uploader
 - [Tests] migrate to tape
 - [Dev Deps] update `eslint`, `@ljharb/eslint-config`, `@es-shims/api`, `aud`, `safe-publish-latest`

# 2.1.2
 - [Deps] use `call-bind` for Array slice
 - [Deps] update `es-abstract`
 - [readme] update badges
 - [meta] update scripts
 - [Dev Deps] update `eslint`, `@ljharb/eslint-config`, `@es-shims/api`
 - [Tests] migrate travis-ci to Github Actions

# 2.1.1
 - [Refactor] Only require the parts of es-abstract that are used (77% bundle size decrease) (#28)
 - [meta] add `funding` field
 - [Tests] use shared travis-ci configs
 - [Tests] only run `aud` on prod deps
 - [Dev Deps] update `eslint`, `@ljharb/eslint-config`; add `safe-publish-latest`

# 2.1.0
 - [New] add `auto` entry point
 - [Performance] Remove unnecessary `ToInteger` call.
 - [Performance] inline `ES.Call` since `IsCallable` is already checked prior to the loop.
 - [Performance] avoid checking `arguments` indexes beyond `arguments.length`
 - [meta] Add LICENSE file (#25)
 - [Deps] update `define-properties`, `es-abstract`
 - [Dev Deps] update `eslint`, `@ljharb/eslint-config`, `chai`, `mocha`
 - [Tests] fix matrix; use `nvm install-latest-npm`, test up to latest node
 - [Tests] add `npm run posttest`

# 2.0.4
 - [Performance] the entry point should use the native function when compliant

# 2.0.3
 - [Fix] again: don’t needlessly shim `Array#find` (#22)

# 2.0.2
 - [Fix] don’t needlessly shim `Array#find` (#22)
 - [Deps] update `es-abstract`
 - [Dev Deps] update `@es-shims/api`, `mocha`, `eslint`, `@ljharb/eslint-config`
 - [Tests] up to `node` `v7.4`, `v4.7`; improve test matrix

# 2.0.1
 - [Fix] use call instead of apply in bound entry point function (#20)
 - [Tests] up to `node` `v7.0`, `v6.9`, `v5.12`; improve test matrix
 - [Tests] add `npm run lint`

# 2.0.0
 - [Breaking] implement es-shim API (#15)
 - [Fix] use ToLength, not ToUint32 (#15)
 - [Fix] Uncallable predicates must throw even when the array is empty (#15)
 - [Docs] fix browserify example (#12)

# 1.0.0
 - [Breaking] do not skip holes (per ES6 change) (#6)
 - [Dev Deps] update `mocha`
 - [Fix] Older browsers report the typeof some host objects and regexes as "function" (#8)

# 0.2.0
 - [Tests] Add travis support (#5)
 - [Tests] Add tests (#5)
 - [Fix] Fix failing test: 'should work with an array-like object with negative length' (#5)

# 0.1.1
 - [Fix] check if `Array#find` already exists (#4)

# 0.1.0
 - Initial release
