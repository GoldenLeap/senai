R3# AI Assistant Instructions for Angular Example Project

## Project Overview
This is an Angular v20+ project with a modular architecture focusing on component-based development. The project follows modern Angular practices including signal-based state management.

## Key Architecture Patterns

### Component Structure
- Components are organized in feature-specific folders under `src/app/`
- Example: `produtos` component in `src/app/produtos/`
- Each component follows the pattern:
  - `*.ts` - Component logic
  - `*.html` - Component template
  - `*.css` - Component styles
  - `*.spec.ts` - Component tests

### Application Architecture
- Main application root is in `src/app/app.ts`
- Routing configuration in `app.routes.ts`
- Global styles in `src/styles.css`
- Configuration in `app.config.ts`

## Development Workflows

### Local Development
```bash
ng serve
```
This starts the development server at http://localhost:4200 with hot reload.

### Generating New Components
Use Angular CLI for scaffolding:
```bash
ng generate component <name>
```
This creates all necessary component files following project structure.

### Building
```bash
ng build
```
Builds production-ready application in `dist/` directory.

### Testing
- Unit tests: `ng test` (using Karma)
- E2E tests: `ng e2e` (framework to be chosen)

## Project-Specific Conventions

### State Management
- Using Angular signals for reactive state management
- Example from `app.ts`:
  ```typescript
  protected readonly title = signal('World');
  ```

### Component Architecture
- Template files are separate from component logic
- Imports are organized by Angular features first, then application imports
- Components use standalone component architecture with explicit imports

## Key Integration Points
- Angular Router for navigation
- Angular CLI for development tooling
- Karma for unit testing

When modifying this codebase, ensure:
1. All new components follow the established file structure pattern
2. Component state uses signals where appropriate
3. Tests are maintained alongside component changes
4. Build and serve commands succeed before committing

## Need Help?
Refer to:
- `README.md` for basic commands and setup
- Angular CLI documentation for scaffolding commands
- Angular dev portal (https://angular.dev) for framework guidance