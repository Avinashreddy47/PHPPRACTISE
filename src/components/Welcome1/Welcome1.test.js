import { render, screen } from '@testing-library/react';
import Welcome1 from './Welcome1';

test('renders learn react link', () => {
  render(<Welcome1 />);
  const linkElement = screen.getByText(/learn react/i);
  expect(linkElement).toBeInTheDocument();
});
